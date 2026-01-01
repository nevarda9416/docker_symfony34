<?php
namespace ContactBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @Assert\NotBlank(message="Please enter your name.")
     * @Assert\Length(min=2, max=100, minMessage="Name too short.", maxMessage="Name too long.")
     */
    private $name;

    /**
     * @Assert\NotBlank(message="Please enter your email.")
     * @Assert\Email(message="Please enter a valid email address.")
     */
    private $email;
    
    /**
     * @Assert\NotBlank(message="Message cannot be blank.")
     * @Assert\Length(min=5, max=2000, minMessage="Message too short.", maxMessage="Message too long.")
     */
    private $message;

    // -- getters / setters --
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}
