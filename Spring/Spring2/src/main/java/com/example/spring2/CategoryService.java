package com.example.spring2;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class CategoryService {
    @Autowired
    CategoryRepository categoryRepository;

    private long Id = 0;

    public CategoryService(){
    }

    public void begin(){
        List<Category> templist = categoryRepository.findAll();
        if (templist.size() != 0)
            Id = templist.get(templist.size() - 1).getId();
    }

    public void seed(){
        if(categoryRepository.findByName("pieczywo").size() == 0) {
            Id++;
            Category cat1 = Category.builder().id(Id).name("pieczywo").code(1000L).build();
            categoryRepository.save(cat1);
        }
        if(categoryRepository.findByName("nabiał").size() == 0) {
            Id++;
            Category cat2 = Category.builder().id(Id).name("nabiał").code(1001L).build();
            categoryRepository.save(cat2);
        }
    }


    private boolean isEmpty() {
        return categoryRepository.count() == 0;
    }

    public List<Category> getAllCategory() {
        return categoryRepository.findAll();
    }

    public void addCategory(Category category) {
        if(categoryRepository.findByName(category.getName()).size() == 0) {
            Id++;
            category.setId(Id);
            categoryRepository.save(category);
        }
    }

    public Category getCategoryById(long id) {
        var value = categoryRepository.findById(id);
        return value.isEmpty()?null:value.get();
    }

    public Category getCategory(Category category){
        return getCategoryById(category.getId());
    }

    public void updateCategory(Category category) {
        categoryRepository.save(category);
    }

    public void deleteCategory(Category category) {
        categoryRepository.deleteById(category.getId());
    }

    public void deleteCategoryById(long id) {
        categoryRepository.deleteById(id);
    }

}
