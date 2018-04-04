<?php

namespace App\Security\Guard;

use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\TokenExtractorInterface;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator;

class JWTAuthenticator extends JWTTokenAuthenticator
{
    /**
     * {@inheritdoc}
     */
    protected function getTokenExtractor()
    {
        $chainExtractor = parent::getTokenExtractor();

        $chainExtractor->removeExtractor(function (TokenExtractorInterface $ext) {
            return $ext instanceof AuthorizationHeaderTokenExtractor;
        });

        $chainExtractor->addExtractor(new AuthorizationHeaderTokenExtractor('JWT', 'Authorization'));

        return $chainExtractor;
    }
}
