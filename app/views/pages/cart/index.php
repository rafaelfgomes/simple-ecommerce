<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="col">

        <p class="h3 pt-3 pb-5">Meu carrinho</p>

        <?php if(count($_SESSION['cart'])) : ?>

            <p class="pb-3">Confira os itens adicionados</p>

            <div class="row pb-5">

                <div class="col-md-6 col-12 text-center pb-2">

                    <a class="btn btn-info w-75" href="<?php echo URLROOT; ?>" role="button">Continuar comprando</a>

                </div>
                
                <div class="col-md-6 col-12 text-center">

                    <a class="btn btn-success w-75" href="#" role="button">Concluir pedido</a>

                </div>
            
            </div>

            <table class="table table-hover">

                <thead>

                    <tr class="text-center">
                        <th class="align-middle" scope="col">Produto</th>
                        <th class="align-middle" scope="col">Quantidade</th>
                        <th class="align-middle" scope="col">Valor Unitário</th>
                        <th class="align-middle" scope="col">Valor Total</th>
                        <th class="align-middle" scope="col"></th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach($_SESSION['cart'] as $product) : ?>
                        
                        <tr>
                            <td class="align-middle">
                                <?php echo $product->name; ?>
                            </td>
                            <td class="text-center align-middle"><?php echo $product->quantity; ?></td>
                            <td class="text-center align-middle">R$&nbsp;<?php echo number_format($product->price, 2, ',', '.'); ?></td>
                            <td class="text-center align-middle">R$&nbsp;<?php echo number_format($product->total_price, 2, ',', '.'); ?></td>
                            <td class="text-center align-middle">
                                <form action="<?php echo URLROOT ?>/cart/remove" method="POST">
                                    <input type="hidden" name="cart-id" value="<?php echo $product->id; ?>">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    <tr style="height: 100px;">

                        <td class="align-middle" colspan="3"><span class="font-weight-bold">TOTAL</span></td>
                        <td class="align-middle" colspan="2">
                            <span class="font-weight-bold">R$&nbsp;<?php echo number_format($data['totalAmountValue']->total_amount, 2, ',', '.') ; ?></span>
                        </td>
                    
                    </tr>
                    
                </tbody>

            </table>
        
        <?php else : ?>

            <div class="card">

                <div class="card-body">

                    <p class="h2 font-weight-bold pb-4">Não há produtos em seu carrinho.</p>
                
                    <p class="mb-0">Para inserir algum produto no seu carrinho, navegue pelos departamentos ou utilize a busca do site. Ao encontrar os itens desejados, clique no botão COMPRAR localizado na página do produto.</p>

                </div>

            </div>

            <p class="text-right pt-4">

                <a class="btn btn-info w-25" href="<?php echo URLROOT; ?>" role="button">Continuar comprando</a>

            </p>

        <?php endif; ?>


    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>