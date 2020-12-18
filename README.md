# Magento 2 Product Labels GraphQL / PWA

**Magento Product Labels GraphQL is now a part of Mageplaza Product Labels that adds GraphQL features; this supports PWA Studio.**

[Mageplaza Product Labels for Magento 2](https://www.mageplaza.com/magento-2-product-labels/) is a useful tool that helps you display the specific announcements on a product in a way more attractive and noticeable. 

The extension uses visual-catching labels to display with the products instead of boring texts or announcements. When customers visit your store, they can see the label attached to a specific product and immediately know the message you want to convey. The content of product labels can be sales, discount percentage, free shipping, hot deal, bestsellers, or new items. 

There are pre-made label templates for you to choose from. You can customize the templates to add the text you want, depending on the purpose of the label and your demand. Because “Best Seller” is one of the most used labels, the extension enables you to design it easily from the admin backend. You can change the background color, font, and text to make your label more unique and eye-catching. Custom CSS is also supported to help the store admin edit the label more efficiently. 

You can automatically assign product labels to any appropriate category and item by configuring it at the back end instead of manually applying one label for several products. The labels will be selected based on flexible conditions, such as product category, product attributes, attribute sets, and product SKU. 

After finishing customizing the product labels, you can preview the appearance of the labels on the page you have selected right from the backend. So you can quickly check if you have any mistake and fix it right away without turning back and forth within the back and front end. 

## 1. How to install

Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-product-labels-graphql
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

**Note:** Magento 2 Product Labels GraphQL requires installing [Mageplaza Product Labels](https://www.mageplaza.com/magento-2-product-labels/) in your Magento installation. 

## 2. How to use

To start working with Product Labels GraphQL in Magento, you need the following:

- Use Magento 2.3.x. Return your site to developer mode
- Install [chrome extension](https://chrome.google.com/webstore/detail/chromeiql/fkkiamalmpiidkljmicmjfbieiclmeij?hl=en) (currently does not support other browsers)
- Set **GraphQL endpoint** as `http://<magento2-3-server>/graphql` in url box, click **Set endpoint**. (e.g. http://develop.mageplaza.com/graphql/ce232/graphql)
- Mageplaza-supported queries are fully written in the **Description** section of `Query.LabelRules`

![](https://i.imgur.com/rjCYdtu.png)

- In addition, the label information is also displayed when using GraphQL to retrieve the information of the Product, according to Magento. Supported queries are fully written at `Product.ProductInterface.mp_label_data.LabelRules`


![](https://i.imgur.com/EfVzRxD.png)

## 3. Devdocs

- [Magento 2 Product Labels API & examples](https://documenter.getpostman.com/view/10589000/SzYXWeLf?version=latest)
- [Magento 2 Product Labels GraphQL & examples](https://documenter.getpostman.com/view/10589000/SzYXVygT?version=latest)

Click on Run in Postman to add these collections to your workspace quickly. 

![Magento 2 blog graphql pwa](https://i.imgur.com/lhsXlUR.gif)

## 4. Contribute to this module 

Feel free to **Fork** and contribute to this module. 
You can create a pull request, so we will merge your changes in the main branch. 

## 5. Get Support 

- Don't hesitate to [contact us](https://www.mageplaza.com/contact.html) if you have any questions. 
- If this project is helpful for you, please give us a **Star** ![star](https://i.imgur.com/S8e0ctO.png)

