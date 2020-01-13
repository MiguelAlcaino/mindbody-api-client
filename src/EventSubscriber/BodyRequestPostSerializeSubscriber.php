<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\EventSubscriber;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\Metadata\StaticPropertyMetadata;
use MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPBody\Request\BodyRequest;

class BodyRequestPostSerializeSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            [
                'event'    => 'serializer.post_serialize',
                'method'   => 'onPostSerialize',
                'class'    => BodyRequest::class, // if no class, subscribe to every serialization
                'format'   => 'xml', // optional format
                'priority' => 0, // optional priority
            ],
        ];
    }

    public function onPostSerialize(ObjectEvent $event)
    {
        $visitor = $event->getVisitor();
        /** @var BodyRequest $body */
        $body    = $event->getObject();
        $content = $body->getContent();
        $visitor->visitProperty(
            new StaticPropertyMetadata(
                '', $content->getSoapMethodName(), null
            ),
            $content
        );
    }

}
