<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Contact;

class IndexController extends AbstractController
{
    #[Route('/', name: 'main')]
    function main()
    {
        return $this->render('index.html.twig');
    }

    #[Route('/contact', name: 'contact')]
    function contact(ManagerRegistry $doctrine)
    {
        $request = Request::createFromGlobals();
        $clientName = $request->request->get('client-name');
        $clientEmail = $request->request->get('client-email');
        $message = $request->request->get('client-message');

        if ($request->isMethod('POST')) {
            $error = null;
            if (!$clientName || !$clientEmail || !$message) {
                $error = 'Client name, email or message was not set';
            }

            if (strlen($clientEmail) < 3) {
                $error = 'Email is less than 3 symbols';
            }

            if ($error) {
                return $this->render('contact.html.twig', [
                    'error' => $error
                ]);
            }

            $contact = new Contact();

            $contact->setEmail($clientEmail);
            $contact->setName($clientName);
            $contact->setMessage($message);

            $manager = $doctrine->getManager();

            $manager->persist($contact); // pridedam $contact objektą į sąrašą queriu kuriuos mes vykdysim

            $manager->flush(); // mes įvykdom visus querius.

            return $this->render('contact.html.twig', [
                'success' => true
            ]);
        }

        return $this->render('contact.html.twig');
    }

    #[Route('/admin', name: 'admin')]
    function admin(ManagerRegistry $doctrine)
    {
        $contactRepository = $doctrine->getManager()->getRepository(Contact::class);

        $contacts = $contactRepository->findAll();

        return $this->render('admin.html.twig', [
            'contacts' => $contacts
        ]);
    }

    #[Route('/admin/contact/{id}', name: 'view_contact')]
    function viewContact(ManagerRegistry $doctrine, $id)
    {
        $contactRepository = $doctrine->getManager()->getRepository(Contact::class);

        $contact = $contactRepository->findOneBy(['id' => $id]);

        return $this->render('single-contact.html.twig', [
            'contact' => $contact
        ]);
    }
}
