package com.example.spring2;

import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import java.util.List;

@SpringBootTest
public class ProductRepositoryTest {
    @Autowired
    private ProductRepository productRepository;

    @Test
    public void allProductsTest(){
        List<Product> productList=productRepository.findAll();
        System.out.println("productList = " + productList);
    }
    @Test
    public void byNameTest(){
        List<Product> productList=productRepository.findByName("Chleb");
        System.out.println("productList = " + productList);
    }
//    @Test
//    public void byNameContainingTest(){
//        List<Product> productList=productRepository.findByNameContaining("o");
//        System.out.println("productList = " + productList);
//    }
//    @Test
//    public void byIndexGreaterTest(){
//        List<Product> productList=productRepository.findByIndexGreaterThanOrNameContaining(5,"a");
//        System.out.println("productList = " + productList);
//    }
    @Test
    public void getProductNameWithNameLengthLessThanTest() {
        List<String> namesList = productRepository.getProductNameWithNameLengthLessThan(4);
        System.out.println("product names = " + namesList);
    }
    @Test
    public void getProductNameWithNameLengthLessThanTest2() {
        List<String> namesList = productRepository.getProductNameWithNameLengthLessThanNative(4);
        System.out.println("product names = " + namesList);
    }

}
