<?php

namespace ZuTeilen\NeosHelper\Fusion\Helper;

use Neos\Eel\ProtectedContextAwareInterface;
use Neos\ContentRepository\Domain\Model\NodeInterface;

class FilterNodesByReferenceHelper implements ProtectedContextAwareInterface
{

    /**
     * @param Array|NodeInterface $nodes
     * @param Array|NodeInterface $filterReferences
     * @param String $referenceProperty
     * @return string
     */
    public function filterNodes($nodes, $filterReferences, $referenceProperty)
    {
        $filters = array();
        $filteredNodes = array();

        foreach ($filterReferences as $filter)
        {
            array_push($filters, $filter->getIdentifier());
        }

        foreach ($nodes as $node) {
            if ($this->isNodeConnectedToReference($node, $filters, $referenceProperty))
            {
                array_push($filteredNodes, $node);
            }

        }
        return $filteredNodes;
    }

    /**
     * @param $node
     * @param $filters
     * @return bool
     */
    public function isNodeConnectedToReference($node, $filters, $referenceProperty)
    {
        $nodeReferences = $node->getProperty($referenceProperty);
        if (!is_null($nodeReferences)) {
            foreach ($nodeReferences as $nodeReference)
            {
                if (in_array($nodeReference->getIdentifier(), $filters))
                {
                    return true;
                }
            }
        }
        return false;
    }


    /**
     * All methods are considered safe, i.e. can be executed from within Eel
     *
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return TRUE;
    }

}