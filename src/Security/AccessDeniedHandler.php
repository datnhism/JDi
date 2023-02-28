<?php
namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    public function handle(Request $request, AccessDeniedException $accessDeniedException): ?Response
    {
        // ...
        $content ="
        <div style='position: relative; margin: auto; display: flex; justify-content: center; width: 100%; height:50%;'>
            <p style='font-size: 50px; color: black; top: 13%; position: absolute;'>Access Denied<p/>
            <p style='font-size: 40px; color: black; top: 28%; position: absolute;'>Please return to the home page<p/>
            <a style='font-size: 30px;color: black;top: 53%;left: 47%;font-weight: bold;position: absolute;' href='http://localhost:8000/'>Return</a>
        </div>
        ";
        return new Response($content, 403);
    }
}
?>