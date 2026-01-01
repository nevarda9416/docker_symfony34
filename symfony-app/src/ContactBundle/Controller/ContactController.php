<?php
namespace ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ContactBundle\Entity\Contact;
use ContactBundle\Form\Type\ContactType;

class ContactController extends Controller
{
    public function newAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                // Valid: do what you want (persist, email, etc)
                // Example: flash and redirect
                $this->addFlash('success', 'Your message has been sent.');

                // If you persist to DB, inject Doctrine and persist here
                return $this->redirectToRoute('contact_success');
            } else {
                // Invalid: errors will render in the form
                $this->addFlash('error', 'Please fix the errors below.');
            }
        }

        return $this->render('@ContactBundle/Contact/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function successAction()
    {
        return $this->render('@ContactBundle/Contact/success.html.twig');
    }
}
