$('#product-detail-modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botão que acionou o modal
  
  // Extrai informação dos atributos data-*
  var name = button.data('name')
  var description = button.data('description')
  var price = button.data('price')

  var modal = $(this)

  modal.find('.modal-title').text(`${name}`)

  modal.find('.modal-body p#product-description').text(description)
  modal.find('.modal-body span#product-price').html(price)

})