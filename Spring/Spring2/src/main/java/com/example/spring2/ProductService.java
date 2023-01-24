package com.example.spring2;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class ProductService {
    @Autowired
    ProductRepository productRepository;

    private long Id = 0;

    public ProductService() {}

    public void begin(){
        List<Product> templist = productRepository.findAll();
        if (templist.size() != 0)
            Id = templist.get(templist.size() - 1).getId();
    }

    public void seed(){
        Id++;
        Product prod1 = Product.builder().id(Id).name("Chleb").weight(1f).price(5.20f).category("pieczywo").build();
        productRepository.save(prod1);
        Id++;
        Product prod2 = Product.builder().id(Id).name("Masło").weight(2.50f).price(7f).category("nabiał").build();
        productRepository.save(prod2);
        Id++;
        Product prod3 = Product.builder().id(Id).name("Ser").weight(0.3f).price(8.29f).category("nabiał").build();
        productRepository.save(prod3);
    }


    private boolean isEmpty() {
        return productRepository.count() == 0;
    }

    public List<Product> getAllProduct() {
        return productRepository.findAll();
    }

    public void addProduct(Product product) {
        Id++;
        product.setId(Id);
        productRepository.save(product);
    }

    public Product getProductById(long id) {
        var value = productRepository.findById(id);
        return value.isEmpty()?null:value.get();
    }

    public Product getProduct(Product product){
        return getProductById(product.getId());
    }

    public void updateProduct(Product product) {
        productRepository.save(product);
    }

    public void deleteProduct(Product product) {
        productRepository.deleteById(product.getId());
    }

    public void deleteProductById(long id) {
        productRepository.deleteById(id);
    }

    public void deleteProductByCategory(String category) {
        var value = productRepository.findByCategory(category);
        for (Product var: value) {
            productRepository.deleteById(var.getId());
        }
    }

}
