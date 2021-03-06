<?php

namespace Base;

use \Timeline as ChildTimeline;
use \TimelineQuery as ChildTimelineQuery;
use \Exception;
use \PDO;
use Map\TimelineTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'TimeLine' table.
 *
 *
 *
 * @method     ChildTimelineQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildTimelineQuery orderByFromDate($order = Criteria::ASC) Order by the from_Date column
 * @method     ChildTimelineQuery orderByToDate($order = Criteria::ASC) Order by the to_Date column
 *
 * @method     ChildTimelineQuery groupById() Group by the id column
 * @method     ChildTimelineQuery groupByFromDate() Group by the from_Date column
 * @method     ChildTimelineQuery groupByToDate() Group by the to_Date column
 *
 * @method     ChildTimelineQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTimelineQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTimelineQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTimelineQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTimelineQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTimelineQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTimelineQuery leftJoinEvent($relationAlias = null) Adds a LEFT JOIN clause to the query using the Event relation
 * @method     ChildTimelineQuery rightJoinEvent($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Event relation
 * @method     ChildTimelineQuery innerJoinEvent($relationAlias = null) Adds a INNER JOIN clause to the query using the Event relation
 *
 * @method     ChildTimelineQuery joinWithEvent($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Event relation
 *
 * @method     ChildTimelineQuery leftJoinWithEvent() Adds a LEFT JOIN clause and with to the query using the Event relation
 * @method     ChildTimelineQuery rightJoinWithEvent() Adds a RIGHT JOIN clause and with to the query using the Event relation
 * @method     ChildTimelineQuery innerJoinWithEvent() Adds a INNER JOIN clause and with to the query using the Event relation
 *
 * @method     \EventQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTimeline findOne(ConnectionInterface $con = null) Return the first ChildTimeline matching the query
 * @method     ChildTimeline findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTimeline matching the query, or a new ChildTimeline object populated from the query conditions when no match is found
 *
 * @method     ChildTimeline findOneById(int $id) Return the first ChildTimeline filtered by the id column
 * @method     ChildTimeline findOneByFromDate(string $from_Date) Return the first ChildTimeline filtered by the from_Date column
 * @method     ChildTimeline findOneByToDate(string $to_Date) Return the first ChildTimeline filtered by the to_Date column *

 * @method     ChildTimeline requirePk($key, ConnectionInterface $con = null) Return the ChildTimeline by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTimeline requireOne(ConnectionInterface $con = null) Return the first ChildTimeline matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTimeline requireOneById(int $id) Return the first ChildTimeline filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTimeline requireOneByFromDate(string $from_Date) Return the first ChildTimeline filtered by the from_Date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTimeline requireOneByToDate(string $to_Date) Return the first ChildTimeline filtered by the to_Date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTimeline[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTimeline objects based on current ModelCriteria
 * @method     ChildTimeline[]|ObjectCollection findById(int $id) Return ChildTimeline objects filtered by the id column
 * @method     ChildTimeline[]|ObjectCollection findByFromDate(string $from_Date) Return ChildTimeline objects filtered by the from_Date column
 * @method     ChildTimeline[]|ObjectCollection findByToDate(string $to_Date) Return ChildTimeline objects filtered by the to_Date column
 * @method     ChildTimeline[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TimelineQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\TimelineQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Timeline', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTimelineQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTimelineQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTimelineQuery) {
            return $criteria;
        }
        $query = new ChildTimelineQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTimeline|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TimelineTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TimelineTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTimeline A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, from_Date, to_Date FROM TimeLine WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTimeline $obj */
            $obj = new ChildTimeline();
            $obj->hydrate($row);
            TimelineTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildTimeline|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTimelineQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TimelineTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTimelineQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TimelineTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTimelineQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(TimelineTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(TimelineTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TimelineTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the from_Date column
     *
     * Example usage:
     * <code>
     * $query->filterByFromDate('2011-03-14'); // WHERE from_Date = '2011-03-14'
     * $query->filterByFromDate('now'); // WHERE from_Date = '2011-03-14'
     * $query->filterByFromDate(array('max' => 'yesterday')); // WHERE from_Date > '2011-03-13'
     * </code>
     *
     * @param     mixed $fromDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTimelineQuery The current query, for fluid interface
     */
    public function filterByFromDate($fromDate = null, $comparison = null)
    {
        if (is_array($fromDate)) {
            $useMinMax = false;
            if (isset($fromDate['min'])) {
                $this->addUsingAlias(TimelineTableMap::COL_FROM_DATE, $fromDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fromDate['max'])) {
                $this->addUsingAlias(TimelineTableMap::COL_FROM_DATE, $fromDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TimelineTableMap::COL_FROM_DATE, $fromDate, $comparison);
    }

    /**
     * Filter the query on the to_Date column
     *
     * Example usage:
     * <code>
     * $query->filterByToDate('2011-03-14'); // WHERE to_Date = '2011-03-14'
     * $query->filterByToDate('now'); // WHERE to_Date = '2011-03-14'
     * $query->filterByToDate(array('max' => 'yesterday')); // WHERE to_Date > '2011-03-13'
     * </code>
     *
     * @param     mixed $toDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTimelineQuery The current query, for fluid interface
     */
    public function filterByToDate($toDate = null, $comparison = null)
    {
        if (is_array($toDate)) {
            $useMinMax = false;
            if (isset($toDate['min'])) {
                $this->addUsingAlias(TimelineTableMap::COL_TO_DATE, $toDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($toDate['max'])) {
                $this->addUsingAlias(TimelineTableMap::COL_TO_DATE, $toDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TimelineTableMap::COL_TO_DATE, $toDate, $comparison);
    }

    /**
     * Filter the query by a related \Event object
     *
     * @param \Event|ObjectCollection $event the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildTimelineQuery The current query, for fluid interface
     */
    public function filterByEvent($event, $comparison = null)
    {
        if ($event instanceof \Event) {
            return $this
                ->addUsingAlias(TimelineTableMap::COL_ID, $event->getTimelineid(), $comparison);
        } elseif ($event instanceof ObjectCollection) {
            return $this
                ->useEventQuery()
                ->filterByPrimaryKeys($event->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByEvent() only accepts arguments of type \Event or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Event relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTimelineQuery The current query, for fluid interface
     */
    public function joinEvent($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Event');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Event');
        }

        return $this;
    }

    /**
     * Use the Event relation Event object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EventQuery A secondary query class using the current class as primary query
     */
    public function useEventQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEvent($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Event', '\EventQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTimeline $timeline Object to remove from the list of results
     *
     * @return $this|ChildTimelineQuery The current query, for fluid interface
     */
    public function prune($timeline = null)
    {
        if ($timeline) {
            $this->addUsingAlias(TimelineTableMap::COL_ID, $timeline->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the TimeLine table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TimelineTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TimelineTableMap::clearInstancePool();
            TimelineTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TimelineTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TimelineTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TimelineTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TimelineTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TimelineQuery
