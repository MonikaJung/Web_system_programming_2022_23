package com.example.productlist2;

import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
public class ProductService {
    ArrayList<Product> productList = new ArrayList<>();
    private int Id = 0;

    public ProductService() {
    }

    public void seed(){
        Id++;
        productList.add(new Product(Id, "Chleb", 1f, 5.20f, "pieczywo"));
        Id++;
        productList.add(new Product(Id, "Masło", 2.5f, 7f, "nabiał"));
        Id++;
        productList.add(new Product(Id, "Ser", 0.3f, 8.29f, "nabiał"));
    }

    private boolean isEmpty() {
        return productList.size() == 0;
    }

    public List<Product> getAllProduct() {
        return productList;
    }

    public void addProduct(Product product) {
        Id++;
        product.setId(Id);
        productList.add(product);
    }
    public Product getProductById(long id) {
        for(Product Product:productList){
            if(Product.getId()==id)
                return Product;
        }
        return null;
    }
    public Product getProduct(Product product){
        return getProductById(product.getId());
    }
    public void updateProduct(Product product) {
        deleteProduct(product);
        productList.add(product);
    }
    public void deleteProduct(Product product) {
        productList.remove(getProductById(product.getId()));
    }
    public void deleteProductById(long id) {
        productList.remove(getProductById(id));
    }

}
