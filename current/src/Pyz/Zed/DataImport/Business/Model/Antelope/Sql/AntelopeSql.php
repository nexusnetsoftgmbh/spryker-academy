<?php
declare(strict_types=1);

namespace Pyz\Zed\DataImport\Business\Model\Antelope\Sql;


class AntelopeSql implements AntelopeSqlInterface
{
    /**
     * @return string
     */
    public function getImportSql(): string
    {
        return "WITH records AS (
                    SELECT input.name,
                           input.color,
                           id_antelope as idAntelope
                    FROM (
                             SELECT unnest(? :: VARCHAR[]) AS name,
                                    unnest(? :: VARCHAR[]) AS color
                         ) input
                             LEFT JOIN pyz_antelope ON pyz_antelope.name = input.name
                ),
                     updated AS (
                         UPDATE pyz_antelope
                             SET
                                 name = records.name,
                                 color = records.color
                             FROM records
                             WHERE records.name = pyz_antelope.name
                             RETURNING id_antelope
                     ),
                     inserted AS (
                         INSERT INTO pyz_antelope (
                                                   id_antelope,
                                                   name,
                                                   color
                             ) (
                             SELECT 
                                    nextval('pyz_antelope_pk_seq'),
                                    name,
                                    color
                             FROM records
                             WHERE idAntelope is null
                         ) RETURNING id_antelope
                     )
                SELECT updated.id_antelope
                FROM updated
                UNION ALL
                SELECT inserted.id_antelope
                FROM inserted;";
    }
}
