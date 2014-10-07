<?php namespace Combustion;

class Site {

	private $_siteName;
	private $_docRoot;
	private $_repo;

	public function __construct() {
		// Intialize site object
	}

    /**
     * Gets the value of _siteName.
     *
     * @return mixed
     */
    public function getSiteName()
    {
        return $this->_siteName;
    }
    
    /**
     * Sets the value of _siteName.
     *
     * @param mixed $_siteName the  site name 
     *
     * @return self
     */
    private function setSiteName($siteName)
    {
        $this->_siteName = $siteName;

        return $this;
    }

    /**
     * Gets the value of _docRoot.
     *
     * @return mixed
     */
    public function getDocRoot()
    {
        return $this->_docRoot;
    }
    
    /**
     * Sets the value of _docRoot.
     *
     * @param mixed $_docRoot the  doc root 
     *
     * @return self
     */
    private function setDocRoot($docRoot)
    {
        $this->_docRoot = $docRoot;

        return $this;
    }

    /**
     * Gets the value of _repo.
     *
     * @return mixed
     */
    public function getRepo()
    {
        return $this->_repo;
    }
    
    /**
     * Sets the value of _repo.
     *
     * @param mixed $_repo the  repo 
     *
     * @return self
     */
    private function setRepo($repo)
    {
        $this->_repo = $repo;

        return $this;
    }

    /**
     * Executes the necessary commands to create a site
     * @return boolean Returns if site-creation succeeded
     */
    public function make() {
    	// Create the site
    	
    	return false;
    }

}