<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactModel extends AbstractType
{
    private ?string $email = null;
    private ?string $subject = null;
    private ?string $message = null;

    // /**
    //  * @param string|null $email
    //  * @param string|null $subject
    //  * @param string|null $message
    //  */
    // public function __construct(?string $email, ?string $subject, ?string $message) {
    // 	$this->email = $email;
    // 	$this->subject = $subject;
    // 	$this->message = $message;
    // }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une adresse mail',
                    ])
                ]
            ])
            ->add('subject', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un sujet',
                    ])
                ]
            ])
            ->add('message', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un message',
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }

    public function getEmail(): ?int
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    public function getSubject(): ?int
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }
    public function getMessage(): ?int
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
