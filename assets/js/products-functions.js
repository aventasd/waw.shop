'use strict';

let generateAllProducts = () => {
    let parent = $('#product-list');

    dataProducts.forEach(product=> {
        let productParent = $('<div>').addClass(`col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ${product.type}`);
        //Product img
        let imgParent = $('<div>')
            .addClass('block2');

        let imgBlock = $('<div>')
            .addClass('block2-pic hov-img0');

        let img = $('<img>', {
            src: product.imgSrc,
            alt: 'IMG-PRODUCT'
        });

        let quickView = $('<a>', {
            href: '#'
        })
            .addClass('block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1')
            .html('Quick View');

        imgBlock.append(img, quickView);
        imgParent.append(imgBlock);
        productParent.append(imgParent);

        //Product info

        let infoParent = $('<div>')
            .addClass('block2-txt flex-w flex-t p-t-14');

        let infoBlock =  $('<div>')
            .addClass('block2-txt-child1 flex-col-l');

        let infoName = $('<a>',{
            href:'product-detail.html'
        })
            .addClass('stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6')
            .html(product.name);

        let infoPrice = $('<span>')
            .addClass('stext-105 cl3')
            .html(`$${product.price}`);

        infoBlock.append(infoName, infoPrice);
        infoParent.append(infoBlock);

        //wish list add btn

        let addToWishListBlock = $('<div>')
            .addClass('block2-txt-child2 flex-r p-t-3');
        let addToWishListBtn = $('<a>',{
            href:'#'
        })
            .addClass('btn-addwish-b2 dis-block pos-relative js-addwish-b2');

        let wishIcon = $('<img>',{
            src:'images/icons/icon-heart-01.png',
            alt:'ICON'
        })
            .addClass('icon-heart1 dis-block trans-04');
        let clickedWishIcon = $('<img>',{
            src:'images/icons/icon-heart-02.png',
            alt:'ICON'
        })
            .addClass('icon-heart2 dis-block trans-04 ab-t-l');
        addToWishListBtn.append(wishIcon, clickedWishIcon);
        addToWishListBlock.append(addToWishListBtn);

        infoParent.append(addToWishListBlock);
        productParent.append(infoParent);

        parent.append(productParent);

    })

};
