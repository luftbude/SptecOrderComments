<?php

declare(strict_types=1);

namespace SptecOrderComments\Extension\System\User;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\User\UserDefinition;
use SptecOrderComments\Extension\Checkout\Order\OrderComment\OrderCommentDefinition;

class UserExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                OrderCommentDefinition::EXTENSION_NAME,
                OrderCommentDefinition::class,
                'created_by_id'
            )
        );
    }

    public function getDefinitionClass(): string
    {
        return UserDefinition::class;
    }

    public function getEntityName(): string
    {
        return UserDefinition::ENTITY_NAME;
    }
}
