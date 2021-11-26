<?php
declare(strict_types=1);

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class CreateProductSuppliesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('product_supplies');
        $table->addColumn('code_product', MysqlAdapter::PHINX_TYPE_INTEGER)
            ->addColumn('code_supply', MysqlAdapter::PHINX_TYPE_INTEGER)
            ->addColumn('price', MysqlAdapter::PHINX_TYPE_DOUBLE, ['limit' => MysqlAdapter::TEXT_LONG])
            ->addForeignKey('code_product', 'products', 'code_product', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->addForeignKey('code_supply', 'supplies', 'code_supply', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->create();
    }
}
