<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Item
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ItemOption", inversedBy="item", cascade={"persist"})
     */
    private $itemOption;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set itemOption
     *
     * @param \AppBundle\Entity\ItemOption $itemOption
     * @return Item
     */
    public function setItemOption(\AppBundle\Entity\ItemOption $itemOption = null)
    {
        $this->itemOption = $itemOption;

        return $this;
    }

    /**
     * Get itemOption
     *
     * @return \AppBundle\Entity\ItemOption
     */
    public function getItemOption()
    {
        return $this->itemOption;
    }
}
