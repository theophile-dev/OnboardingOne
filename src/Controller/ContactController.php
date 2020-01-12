<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    /**
     * @var Contact
     */
    private $contact;

    public function index(): Response {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        return $this->render('pages/contact.html.twig', ['form' => $form->createView()]);
    }

}