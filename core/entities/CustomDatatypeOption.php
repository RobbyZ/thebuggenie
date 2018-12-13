<?php

    namespace thebuggenie\core\entities;

    /**
     * @Table(name="\thebuggenie\core\entities\tables\CustomFieldOptions")
     */
    class CustomDatatypeOption extends DatatypeBase
    {

        protected static $_items = array();

        /**
         * This options value
         *
         * @var string|integer
         * @Column(type="string", length=200)
         */
        protected $_value = null;
        
        /**
         * Custom field key value
         *
         * @var integer
         * @Column(type="integer", length=10)
         * @Relates(class="\thebuggenie\core\entities\CustomDatatype")
         */
        protected $_customfield_id;

        /**
         * Return the options color (if applicable)
         * 
         * @return string
         */
        public function getColor()
        {
            return $this->_itemdata;
        }
        
        public function canBeDeleted()
        {
            return true;
        }

        /**
         * Return the options icon (if applicable)
         * 
         * @return string
         */
        public function getIcon()
        {
            return $this->_itemdata;
        }

        public function isBuiltin()
        {
            return false;
        }

        public function getValue()
        {
            return $this->_value;
        }

        public function setValue($value)
        {
            $this->_value = $value;
        }

        /**
         * @param int $customdatatype
         */
        public function setCustomdatatype($customdatatype)
        {
            $this->_customfield_id = $customdatatype;
        }

        /**
         * @return CustomDatatype
         */
        public function getCustomdatatype(): CustomDatatype
        {
            if (!$this->_customfield_id instanceof CustomDatatype)
            {
                $this->_b2dbLazyLoad('_customfield_id');
            }
            return $this->_customfield_id;
        }

        public function getType()
        {
            return parent::getItemtype();
        }

        public function getFontAwesomeIcon()
        {
            return $this->getCustomdatatype()->getFontAwesomeIcon();
        }

        public function getFontAwesomeIconStyle()
        {
            return $this->getCustomdatatype()->getFontAwesomeIconStyle();
        }
    }
