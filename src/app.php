<?php 

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel;

class LeapYearController extends Controller   {
	private function _isLeapYear($year = null)
	{
		if (null === $year) {
			$year = date('Y');
		}
	
		return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
	}
	
	public function indexAction($year)
	{
		if ($this->_isLeapYear($year)) {
                    //	return new Response('Yes, this is a leap year!');
                    
                    Twig_Autoloader::register();
                    try {
  // specify where to look for templates
  $loader = new Twig_Loader_Filesystem('templates');
  
  // initialize Twig environment
  $twig = new Twig_Environment($loader);
  
  // load template
  $template = $twig->loadTemplate('hello.html.twig');
  echo $template->render(array(
    'name' => 'Clark Kent',
    'username' => 'ckent',
    'password' => 'krypt0n1te',
  ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
		}
	
	}
}



$routes = new RouteCollection();


$routes->add('leap_year', new Route(
	'/is_leap_year/{year}', 
	array('year' => null, '_controller' => 'LeapYearController::indexAction'))
);

$routes->add('leap_year2', new Route(
	'/is_leap_year2/{year}', 
	array('year' => null, '_controller' => 'LeapYearController::indexAction'))
);

return $routes;



class Controller {
    //put your code here
}