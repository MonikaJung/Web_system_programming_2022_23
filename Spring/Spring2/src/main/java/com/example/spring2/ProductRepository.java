package com.example.spring2;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface ProductRepository extends JpaRepository<Product,Long> {
    List<Product> findByName(String name);
//    List<Product> findByNameContaining(String substring);
//    List<Product> findByIndexGreaterThanOrNameContaining(Integer value,String substring);
    //JPQL
    @Query("select s.name from Product s where length(s.name) < ?1")
    List<String> getProductNameWithNameLengthLessThan(Integer value);

    //SQL
    @Query( value = "SELECT NAME FROM Product WHERE CHAR_LENGTH(NAME) < ?1", nativeQuery = true)
    List<String> getProductNameWithNameLengthLessThanNative(Integer value);

    List<Product> findByCategory(String category);

//    @Query
//    List<Long> findByCategory()

}
