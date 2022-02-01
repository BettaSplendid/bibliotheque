<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Book
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue=None
     * @ORM\Column(type="integer")
     */
    private int $ISBN;

    /**
     * @ORM\Column(type="string")
     * @ORM\Column(length="100")
     */
    private string $title;

    /**
     * @ORM\Column(type="string")
     * @ORM\Column(length="100")
     */
    private string $resume;

    /**
     * @ORM\Column(type="string")
     * @ORM\Column(length="100")
     */
    private string $author;

    /**
     * @ORM\Column(type="string")
     * @ORM\Column(length="100")
     */
    private string $editor;

    /**

     * @ORM\Column(type="integer")
     */
    private int $nb_available;

    /**

     * @ORM\Column(type="integer")
     */
    private int $total_borrow_number;

    public function __construct($ISBN, $title, $resume, $author, $editor, $nb_available)
    {
        $this->ISBN = $ISBN;
        $this->title = $title;
        $this->resume = $resume;
        $this->author = $author;
        $this->editor = $editor;
        $this->nb_available = $nb_available;
        $this->total_borrow_number = 0;
    }



    /**
     * Get the value of ISBN
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * Set the value of ISBN
     *
     * @return  self
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of resume
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set the value of resume
     *
     * @return  self
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of editor
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set the value of editor
     *
     * @return  self
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get the value of total_borrow_number
     */
    public function getTotal_borrow_number()
    {
        return $this->total_borrow_number;
    }

    /**
     * Set the value of total_borrow_number
     *
     * @return  self
     */
    public function setTotal_borrow_number($total_borrow_number)
    {
        $this->total_borrow_number = $total_borrow_number;

        return $this;
    }

    /**
     * Get the value of associated_review
     */
    public function getAssociated_review()
    {
        return $this->associated_review;
    }

    /**
     * Set the value of associated_review
     *
     * @return  self
     */
    public function setAssociated_review($associated_review)
    {
        $this->associated_review = $associated_review;

        return $this;
    }

    /**
     * Get the value of nb_available
     */ 
    public function getNb_available()
    {
        return $this->nb_available;
    }

    /**
     * Set the value of nb_available
     *
     * @return  self
     */ 
    public function setNb_available($nb_available)
    {
        $this->nb_available = $nb_available;

        return $this;
    }
}
