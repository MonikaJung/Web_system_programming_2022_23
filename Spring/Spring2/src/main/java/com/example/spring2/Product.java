package com.example.spring2;

import jakarta.persistence.Entity;
import jakarta.persistence.Id;
import lombok.*;

@Entity
@Data
//@NoArgsConstructor
//@AllArgsConstructor
@Builder

public class Product {
    private long id;
    private String name;
    private float weight;
    private float price;
    private String category;

    public Product(){

    }

    public Product(long id, String name, float weight, float price, String category) {
        this.id = id;
        this.name = name;
        this.weight = weight;
        this.price = price;
        this.category = category;
    }

    @Id
    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public float getWeight() {
        return weight;
    }

    public void setWeight(float weight) {
        this.weight = weight;
    }

    public float getPrice() {
        return price;
    }

    public void setPrice(float price) {
        this.price = price;
    }

    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }

}
