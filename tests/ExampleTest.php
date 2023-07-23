<?php

namespace Tests;

class ExampleTest extends TestCase
{
    // Teste que verifica se dois clientes com o mesmo e-mail não podem ser criados
    public function testDuplicateEmailsNotAllowed()
    {
        // Criar um cliente com um endereço de e-mail único
        $uniqueEmail = 'cliente1@example.com';
        $client1 = new Client($uniqueEmail);
        $this->assertTrue($client1->save()); // Assumindo que a função save() retorna true se o cliente foi salvo com sucesso

        // Tentar criar outro cliente com o mesmo e-mail
        $duplicateEmail = 'cliente1@example.com';
        $client2 = new Client($duplicateEmail);
        $this->assertFalse($client2->save()); // Assumindo que a função save() retorna false se o cliente não pôde ser salvo
    }

    // Teste que verifica se um produto deve possuir foto
    public function testProductMustHavePhoto()
    {
        // Criar um produto sem foto
        $productWithoutPhoto = new Product('Produto sem foto', null);
        $this->assertFalse($productWithoutPhoto->save()); // Assumindo que a função save() retorna false se o produto não pôde ser salvo

        // Criar um produto com foto
        $productWithPhoto = new Product('Produto com foto', 'foto.jpg');
        $this->assertTrue($productWithPhoto->save()); // Assumindo que a função save() retorna true se o produto foi salvo com sucesso
    }

    // Teste que verifica a validação de dados ao criar um cliente
    public function testClientDataValidation()
    {
        // Tentar criar um cliente sem endereço de e-mail
        $invalidClient = new Client('');
        $this->assertFalse($invalidClient->save()); // Assumindo que a função save() retorna false se o cliente não pôde ser salvo

        // Tentar criar um cliente com um endereço de e-mail inválido
        $invalidEmailClient = new Client('emailinvalido');
        $this->assertFalse($invalidEmailClient->save());

        // Tentar criar um cliente com um endereço de e-mail válido
        $validClient = new Client('cliente@example.com');
        $this->assertTrue($validClient->save()); // Assumindo que a função save() retorna true se o cliente foi salvo com sucesso
    }

    // Teste que verifica se os produtos são atribuídos corretamente a um tipo pré-definido
    public function testProductTypes()
    {
        // Criar tipos de produtos pré-definidos
        $types = ['Eletrônicos', 'Móveis', 'Roupas'];
        $productTypeService = new ProductTypeService($types);

        // Criar produtos e atribuir a um tipo
        $product1 = new Product('Celular', 'celular.jpg');
        $product1->setProductType($productTypeService->getTypeByName('Eletrônicos'));
        $this->assertTrue($product1->save());

        $product2 = new Product('Sofá', 'sofa.jpg');
        $product2->setProductType($productTypeService->getTypeByName('Móveis'));
        $this->assertTrue($product2->save());
    }

    // Teste que verifica se o pedido pode conter N produtos
    public function testOrderWithMultipleProducts()
    {
        // Criar produtos
        $product1 = new Product('Produto 1', 'produto1.jpg');
        $product2 = new Product('Produto 2', 'produto2.jpg');

        // Criar um pedido e adicionar produtos a ele
        $order = new Order();
        $order->addProduct($product1);
        $order->addProduct($product2);

        // Verificar se o pedido contém os produtos corretos
        $this->assertEquals([$product1, $product2], $order->getProducts());
    }

    // Teste que verifica se um cliente pode ter N pedidos
    public function testClientWithMultipleOrders()
    {
        // Criar cliente
        $client = new Client('cliente@example.com');

        // Criar pedidos e associar ao cliente
        $order1 = new Order();
        $order2 = new Order();
        $client->addOrder($order1);
        $client->addOrder($order2);

        // Verificar se o cliente tem os pedidos corretos
        $this->assertEquals([$order1, $order2], $client->getOrders());
    }

    // Teste que verifica se o soft deleting está funcionando corretamente
    public function testSoftDeleting()
    {
        // Criar um cliente
        $client = new Client('cliente@example.com');
        $client->save();

        // Verificar se o cliente existe no banco de dados
        $this->assertTrue($client->exists());

        // Excluir o cliente (soft delete)
        $client->delete();

        // Verificar se o cliente não existe mais no banco de dados
        $this->assertFalse($client->exists());

        // Verificar se é possível restaurar o cliente
        $client->restore();
        $this->assertTrue($client->exists());
    }

}
