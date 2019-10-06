<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="col">

        <p class="h3 pt-3">Meu carrinho</p>
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

                <tr class="">
                    <td class="align-middle">
                        <?php echo $product->name; ?>
                    </td>
                    <td class="text-center align-middle"><?php echo $product->quantity; ?></td>
                    <td class="text-center align-middle">R$&nbsp;<?php echo number_format($product->price, 2, ',', '.'); ?></td>
                    <td class="text-center align-middle">R$&nbsp;<?php echo number_format($product->total_price, 2, ',', '.'); ?></td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-danger">
                            <i class="fas fa-times"></i>
                        </button>
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

    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>