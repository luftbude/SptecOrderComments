<?php

declare(strict_types=1);

namespace SptecOrderComments\Extension\Content\Media;

use Shopware\Core\Content\Media\MediaDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SptecOrderComments\Extension\Checkout\Order\OrderComment\OrderCommentDefinition;
use SptecOrderComments\Extension\Checkout\Order\OrderComment\OrderCommentMediaDefinition;

class MediaExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                OrderCommentDefinition::EXTENSION_NAME,
                OrderCommentMediaDefinition::class,
                'media_id'
            )
        );
    }

    public function getDefinitionClass(): string
    {
        return MediaDefinition::class;
    }

    public function getEntityName(): string
    {
        return MediaDefinition::ENTITY_NAME;
    }
}
