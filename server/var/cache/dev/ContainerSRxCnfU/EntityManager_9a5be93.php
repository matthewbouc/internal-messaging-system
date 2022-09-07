<?php

namespace ContainerSRxCnfU;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/src/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder1ed70 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerca58e = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties5df8b = [
        
    ];

    public function getConnection()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getConnection', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getMetadataFactory', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getExpressionBuilder', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'beginTransaction', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getCache', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getCache();
    }

    public function transactional($func)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'transactional', array('func' => $func), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'wrapInTransaction', array('func' => $func), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'commit', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->commit();
    }

    public function rollback()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'rollback', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getClassMetadata', array('className' => $className), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'createQuery', array('dql' => $dql), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'createNamedQuery', array('name' => $name), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'createQueryBuilder', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'flush', array('entity' => $entity), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'clear', array('entityName' => $entityName), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->clear($entityName);
    }

    public function close()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'close', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->close();
    }

    public function persist($entity)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'persist', array('entity' => $entity), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'remove', array('entity' => $entity), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'refresh', array('entity' => $entity), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'detach', array('entity' => $entity), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'merge', array('entity' => $entity), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getRepository', array('entityName' => $entityName), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'contains', array('entity' => $entity), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getEventManager', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getConfiguration', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'isOpen', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getUnitOfWork', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getProxyFactory', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'initializeObject', array('obj' => $obj), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'getFilters', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'isFiltersStateClean', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'hasFilters', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return $this->valueHolder1ed70->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializerca58e = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder1ed70) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder1ed70 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder1ed70->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, '__get', ['name' => $name], $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        if (isset(self::$publicProperties5df8b[$name])) {
            return $this->valueHolder1ed70->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1ed70;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder1ed70;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1ed70;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder1ed70;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, '__isset', array('name' => $name), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1ed70;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder1ed70;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, '__unset', array('name' => $name), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder1ed70;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder1ed70;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, '__clone', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        $this->valueHolder1ed70 = clone $this->valueHolder1ed70;
    }

    public function __sleep()
    {
        $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, '__sleep', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;

        return array('valueHolder1ed70');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerca58e = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerca58e;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerca58e && ($this->initializerca58e->__invoke($valueHolder1ed70, $this, 'initializeProxy', array(), $this->initializerca58e) || 1) && $this->valueHolder1ed70 = $valueHolder1ed70;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder1ed70;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder1ed70;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
