<?php
    class Upload
    {
        private $destDir;
        private $checkExtensions;
        private $extensions;
        private $errors = array();
        private $upload_errors = array(
            UPLOAD_ERR_INI_SIZE    => "Larger than upload_max_filesize.",
            UPLOAD_ERR_FORM_SIZE    => "Larger than form MAX_FILE_SIZE.",
            UPLOAD_ERR_PARTIAL    => "Partial upload.",
            UPLOAD_ERR_NO_FILE        => "No file.",
            UPLOAD_ERR_NO_TMP_DIR    => "No temporary directory.",
            UPLOAD_ERR_CANT_WRITE    => "Can't write to disk.",
            UPLOAD_ERR_EXTENSION     => "File upload stopped by extension.",
            UPLOAD_ERR_EMPTY        => "File is empty." // add this to avoid an offset
        );
        
        public function __construct($destDir, $checkExt = false, array $extensions = array())
        {
            $this->destDir = $destDir;
            $this->checkExtensions = $checkExt;
            $this->extensions = $extensions;
        }
        
        public function setExtensions(array $extensions)
        {
            $this->extensions = $extensions;
            
            return $this;
        }
        
        public function getExtensions()
        {
            return $this->extensions;
        }
        
        public function setCheckExtensions($checkExt = true)
        {
            $this->checkExtensions = $checkExt;
            
            return $this;
        }
        
        public function getCheckExtensions()
        {
            return $this->checkExtensions;
        }
        
        public function getErrorsFor($name)
        {
            return $this->errors[$name];
        }
        
        public function getErrors()
        {
            return $this->errors;
        }
        
        public function addError($name, $error) {
            if (!isset($this->errors[$name])) $this->errors[$name] = array();
            
            $this->errors[$name][] = $error;
            
            return $this;
        }
        
        public function moveFile($name)
        {
            if (!$this->isValid($name)) {
                return false;
            }
			
			if($name == '')
			{
				return false;
			}
            
            if(move_uploaded_file($_FILES[$name]['tmp_name'],"$this->destDir/".$_FILES[$name]['name'])) {
                return true;
            }
        }
        
        public function getName($name)
        {
            if (!$this->isValid($name)) {
                return false;
            }
            
            return $_FILES[$name]['name'];
        }
        
        public function getExtension($name)
        {
            if (!$this->isValid($name)) {
                return false;
            }
            
            $fileInfo = pathinfo($_FILES[$name]['name']);
            $ext = strtolower($fileInfo['extension']);
            
            return $ext;
        }
        
        private function isValid($name)
        {
            if (!isset($_FILES[$name])) {
                $this->addError($name, "missing in \$_FILES");
                return false;
            }
        
            if ($_FILES[$name]['error'] != UPLOAD_ERR_OK) {
                $translated = $this->translateUploadError($_FILES[$name]['error']);
                $this->addError($name, $translated);
                return false;
            }
        
            if (!is_uploaded_file($_FILES[$name]['tmp_name'])) {
                $this->addError($name, 'file wasn\'t uploaded by POST, possible attack');
                return false;
            }
        
            if ($checkExt) {
                $ext = $this->getExtension($name);
            
                if (!in_array($ext, $this->extensions)) {
                    $this->addError($name, "invalid extension: {$ext}");
                    return false;
                }
            }
            
            return true;
        }
        
        private function translateUploadError($error)
        {
            return $this->upload_errors[$error];
        }
    }
    
    ?>