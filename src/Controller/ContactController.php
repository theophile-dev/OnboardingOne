<?php


namespace App\Controller;



use App\Entity\Contact;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    /**
     * Display the form, if the form is valid, store the contact data
     * and send an email using ContactNotification
     *
     * @param Request $request
     * @param ContactNotification $notification
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function index(Request $request, ContactNotification $notification, EntityManagerInterface $entityManager): Response {

        $entityManager = $this->getDoctrine()->getManager();

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            // Send an email to the department's manager
            $notification->notify($contact);

            // Comment this line if you want to try sending multiple form without reloading
            // return  $this->redirectToRoute('/');

            $entityManager->persist($contact);
            $entityManager->flush();
        }
        return $this->render('pages/contact.html.twig', ['form' => $form->createView()]);
    }

}