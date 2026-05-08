<?php

class Contact
{
    private int $id;
    private string $name;
    private string $email;
    private string $phone_number;

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id : non, géré par la base de données
     */

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     * 
     * Note : retourner self sur un setter permet de faire du chainage :
     * $contact->setName()->setEmail();
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone_number
     *
     * @return string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    /**
     * Set the value of phone_number
     *
     * @param string $phone_number
     *
     * @return self
     */
    public function setPhoneNumber(?string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * Affiche l'objet
     */
    public function __toString()
    {
        return "[id:$this->id] $this->name | $this->email | $this->phone_number\n";
    }
}