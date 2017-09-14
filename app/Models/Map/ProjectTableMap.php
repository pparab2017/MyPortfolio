<?php

namespace Map;

use \Project;
use \ProjectQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'Project' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ProjectTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ProjectTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Project';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Project';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Project';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'Project.id';

    /**
     * the column name for the Name field
     */
    const COL_NAME = 'Project.Name';

    /**
     * the column name for the Lang_id field
     */
    const COL_LANG_ID = 'Project.Lang_id';

    /**
     * the column name for the des field
     */
    const COL_DES = 'Project.des';

    /**
     * the column name for the img_url field
     */
    const COL_IMG_URL = 'Project.img_url';

    /**
     * the column name for the Notes field
     */
    const COL_NOTES = 'Project.Notes';

    /**
     * the column name for the Others field
     */
    const COL_OTHERS = 'Project.Others';

    /**
     * the column name for the videoLink field
     */
    const COL_VIDEOLINK = 'Project.videoLink';

    /**
     * the column name for the gitLink field
     */
    const COL_GITLINK = 'Project.gitLink';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Name', 'LangId', 'Des', 'ImgUrl', 'Notes', 'Others', 'Videolink', 'Gitlink', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'langId', 'des', 'imgUrl', 'notes', 'others', 'videolink', 'gitlink', ),
        self::TYPE_COLNAME       => array(ProjectTableMap::COL_ID, ProjectTableMap::COL_NAME, ProjectTableMap::COL_LANG_ID, ProjectTableMap::COL_DES, ProjectTableMap::COL_IMG_URL, ProjectTableMap::COL_NOTES, ProjectTableMap::COL_OTHERS, ProjectTableMap::COL_VIDEOLINK, ProjectTableMap::COL_GITLINK, ),
        self::TYPE_FIELDNAME     => array('id', 'Name', 'Lang_id', 'des', 'img_url', 'Notes', 'Others', 'videoLink', 'gitLink', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'LangId' => 2, 'Des' => 3, 'ImgUrl' => 4, 'Notes' => 5, 'Others' => 6, 'Videolink' => 7, 'Gitlink' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'langId' => 2, 'des' => 3, 'imgUrl' => 4, 'notes' => 5, 'others' => 6, 'videolink' => 7, 'gitlink' => 8, ),
        self::TYPE_COLNAME       => array(ProjectTableMap::COL_ID => 0, ProjectTableMap::COL_NAME => 1, ProjectTableMap::COL_LANG_ID => 2, ProjectTableMap::COL_DES => 3, ProjectTableMap::COL_IMG_URL => 4, ProjectTableMap::COL_NOTES => 5, ProjectTableMap::COL_OTHERS => 6, ProjectTableMap::COL_VIDEOLINK => 7, ProjectTableMap::COL_GITLINK => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'Name' => 1, 'Lang_id' => 2, 'des' => 3, 'img_url' => 4, 'Notes' => 5, 'Others' => 6, 'videoLink' => 7, 'gitLink' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('Project');
        $this->setPhpName('Project');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Project');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('Name', 'Name', 'VARCHAR', true, 200, null);
        $this->addForeignKey('Lang_id', 'LangId', 'INTEGER', 'Language', 'id', true, null, null);
        $this->addColumn('des', 'Des', 'VARCHAR', true, 5000, null);
        $this->addColumn('img_url', 'ImgUrl', 'VARCHAR', true, 500, null);
        $this->addColumn('Notes', 'Notes', 'VARCHAR', false, 1000, null);
        $this->addColumn('Others', 'Others', 'VARCHAR', false, 45, null);
        $this->addColumn('videoLink', 'Videolink', 'VARCHAR', false, 500, null);
        $this->addColumn('gitLink', 'Gitlink', 'VARCHAR', false, 500, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Language', '\\Language', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Lang_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ProjectTableMap::CLASS_DEFAULT : ProjectTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Project object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ProjectTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProjectTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProjectTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProjectTableMap::OM_CLASS;
            /** @var Project $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProjectTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ProjectTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProjectTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Project $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ProjectTableMap::COL_ID);
            $criteria->addSelectColumn(ProjectTableMap::COL_NAME);
            $criteria->addSelectColumn(ProjectTableMap::COL_LANG_ID);
            $criteria->addSelectColumn(ProjectTableMap::COL_DES);
            $criteria->addSelectColumn(ProjectTableMap::COL_IMG_URL);
            $criteria->addSelectColumn(ProjectTableMap::COL_NOTES);
            $criteria->addSelectColumn(ProjectTableMap::COL_OTHERS);
            $criteria->addSelectColumn(ProjectTableMap::COL_VIDEOLINK);
            $criteria->addSelectColumn(ProjectTableMap::COL_GITLINK);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.Name');
            $criteria->addSelectColumn($alias . '.Lang_id');
            $criteria->addSelectColumn($alias . '.des');
            $criteria->addSelectColumn($alias . '.img_url');
            $criteria->addSelectColumn($alias . '.Notes');
            $criteria->addSelectColumn($alias . '.Others');
            $criteria->addSelectColumn($alias . '.videoLink');
            $criteria->addSelectColumn($alias . '.gitLink');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ProjectTableMap::DATABASE_NAME)->getTable(ProjectTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ProjectTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ProjectTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ProjectTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Project or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Project object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProjectTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Project) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectTableMap::DATABASE_NAME);
            $criteria->add(ProjectTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ProjectQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ProjectTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ProjectTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Project table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ProjectQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Project or Criteria object.
     *
     * @param mixed               $criteria Criteria or Project object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProjectTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Project object
        }

        if ($criteria->containsKey(ProjectTableMap::COL_ID) && $criteria->keyContainsValue(ProjectTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProjectTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ProjectQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ProjectTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ProjectTableMap::buildTableMap();
