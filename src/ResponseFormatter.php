<?php

declare(strict_types=1);

namespace Dehbka\Maltego;

final class ResponseFormatter
{
    /** @param $entities Entity[] */
    public function format(array $entities): string
    {
        $response = <<<XML
        <MaltegoMessage><MaltegoTransformResponseMessage><Entities>{{entities}}</Entities></MaltegoTransformResponseMessage></MaltegoMessage>
        XML;

        $formattedEntities = '';
        foreach ($entities as $entity) {
            $formattedEntities .= <<<XML
            <Entity Type="{$entity->getType()}"><Value><![CDATA[{$entity->getValue()}]]></Value><Weight>{$entity->getWeight()}</Weight>{{fields}}</Entity>
            XML;

            $formattedEntities = str_replace('{{fields}}', $this->formatAdditionFields($entity), $formattedEntities);
        }

        return str_replace('{{entities}}', $formattedEntities, $response);
    }

    private function formatAdditionFields(Entity $entity): string
    {
        if ([] === $entity->getAdditionFields()) {
            return '';
        }

        $response = <<<XML
            <AdditionalFields>{{fields}}</AdditionalFields>
        XML;

        $fields = '';

        foreach ($entity->getAdditionFields() as $field) {
            $fields .= <<<XML
                <Field Name="{$field->getName()}" DisplayName="{$field->getName()}"><![CDATA[{$field->getValue()}]]></Field>
            XML;
        }

        return str_replace('{{fields}}', $fields, $response);
    }
}
