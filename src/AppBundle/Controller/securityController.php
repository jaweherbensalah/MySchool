<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class securityController extends Controller
{
    /**
     * @Route("/admin/addduser")
     */
    public function addAction()
    {$userManager = $this->container->get('fos_user.user_manager');
     $user =$userManager->createUser();
     $user->setUsername('newUserByUM1');

        $user->setRoles(array ('ROLE_ADMIN'));
        $user->setEmail('newUser11@gmail.com');
        $user->setPlainPassword('userPassword');
        $user->setEnabled(true);
        $userManager->updateUser($user);

        return $this->forward('AppBundle:security:redirect');
    }

    /**
     * @Route("/home")
     */
    public function redirectAction()
    {    $authChecker= $this->container->get('security.authorization_checker');
      if($authChecker->isGranted('ROLE_ADMIN'))
      {
          return $this->render('@App/security/admin_home.twig');
      }
      else if ($authChecker->isGranted('ROLE_USER'))
      {
        return $this->render('@App/security/user_home.html.twig');
      }
      else
      { return $this->render('@FOSUser/Security/login.html.twig');

      }
    }

}
