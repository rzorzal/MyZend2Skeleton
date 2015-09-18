<?php

namespace Admin\Controller;

use Admin\Infra\Controller;
use Zend\View\Model\ViewModel;
use Admin\Form\AuthForm;
use DOMPDFModule\View\Model\PdfModel;

class IndexController extends Controller {

    public function indexAction() {
        $bar = "";
        
        return new ViewModel(array("foo" => $bar));
    }

    

}
