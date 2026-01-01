<?php
namespace ContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use ContactBundle\Entity\Contact;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, ['label' => 'Your name'])
        ->add('email', EmailType::class, ['label' => 'Your email'])
        ->add('message', TextareaType::class, ['label' => 'Message', 'attr' => ['rows' => 6]])
        ->add('submit', SubmitType::class, ['label' => 'Send']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            // enable validation by validator component automatically
            'validation_groups' => ['Default'],
        ]);
    }
}
