<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ComicStatusEnum extends Enum
{
    public const TRAILER = 0;
    public const ONGOING = 1;
    public const COMPLETED = 2;
}
