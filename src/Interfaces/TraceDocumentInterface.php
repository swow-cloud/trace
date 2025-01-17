<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/master/LICENSE
 */

declare(strict_types=1);

namespace Chevere\Trace\Interfaces;

use Chevere\Common\Interfaces\ToArrayInterface;
use Chevere\VarDump\Interfaces\VarDumpDocumentFormatInterface;
use Chevere\VarDump\Interfaces\VarDumperInterface;
use Stringable;

/**
 * Describes the component in charge of defining a trace document.
 */
interface TraceDocumentInterface extends ToArrayInterface, Stringable
{
    public const TAG_ENTRY_FILE = '%file%';

    public const TAG_ENTRY_LINE = '%line%';

    public const TAG_ENTRY_FILE_LINE = '%fileLine%';

    public const TAG_ENTRY_CLASS = '%class%';

    public const TAG_ENTRY_TYPE = '%type%';

    public const TAG_ENTRY_FUNCTION = '%function%';

    public const TAG_ENTRY_CSS_EVEN_CLASS = '%cssEvenClass%';

    public const TAG_ENTRY_POS = '%pos%';

    public const HIGHLIGHT_TAGS = [
        self::TAG_ENTRY_FILE => VarDumperInterface::FILE,
        self::TAG_ENTRY_LINE => VarDumperInterface::FILE,
        self::TAG_ENTRY_FILE_LINE => VarDumperInterface::FILE,
        self::TAG_ENTRY_CLASS => VarDumperInterface::CLASS_REG,
        self::TAG_ENTRY_TYPE => VarDumperInterface::OPERATOR,
        self::TAG_ENTRY_FUNCTION => VarDumperInterface::FUNCTION,
    ];

    public function __construct(
        array $trace,
        VarDumpDocumentFormatInterface $format
    );

    public function getTrTable(
        int $pos,
        TraceEntryInterface $entry
    ): array;

    public function getFunctionWithArguments(
        TraceEntryInterface $entry
    ): string;
}
