<?php
/*
 * @copyright   2019 Mautic, Inc. All rights reserved
 * @author      Mautic, Inc.
 *
 * @link        https://mautic.com
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\IntegrationsBundle\Sync\DAO\Sync;

use MauticPlugin\IntegrationsBundle\Sync\DAO\Sync\Report\RelationDAO;
use Iterator;
use Countable;

class RelationsDAO implements Iterator, Countable
{
    /**
     * @var RelationDAO[]
     */
    private $relations = [];

    /**
     * @var int
     */
    private $position = 0;

    /**
     * @param RelationDAO $relation
     */
    public function addRelation(RelationDAO $relation): void
    {
        $this->relations[] = $relation;
    }

    /**
     * {@inheritdoc}
     */
    public function current(): RelationDAO
    {
        return $this->relations[$this->position];
    }

    /**
     * {@inheritdoc}
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function valid(): bool
    {
        return isset($this->relations[$this->position]);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return count($this->relations);
    }
}