<?php

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2017 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace Jose\Bundle\KeyManagement\Controller;

use Jose\Component\Core\Converter\JsonConverterInterface;
use Jose\Component\Core\JWKSet;

/**
 * Class JWKSetControllerFactory.
 */
final class JWKSetControllerFactory
{
    /**
     * @var JsonConverterInterface
     */
    private $jsonConverter;

    /**
     * JWKSetControllerFactory constructor.
     *
     * @param JsonConverterInterface $jsonConverter
     */
    public function __construct(JsonConverterInterface $jsonConverter)
    {
        $this->jsonConverter = $jsonConverter;
    }

    /**
     * @param JWKSet $jwkset
     * @param int    $maxAge
     *
     * @return JWKSetController
     */
    public function create(JWKSet $jwkset, int $maxAge): JWKSetController
    {
        return new JWKSetController($this->jsonConverter->encode($jwkset), $maxAge);
    }
}
