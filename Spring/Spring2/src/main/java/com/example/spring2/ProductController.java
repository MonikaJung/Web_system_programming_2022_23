package com.example.spring2;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.text.DateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Locale;

@Controller
public class ProductController {
    private final ProductService ProductService;
    public final CategoryService CategoryService;
//    public List<String> categories;

    public ProductController(ProductService ProductService, CategoryService categoryService) {
        this.ProductService = ProductService;
        this.CategoryService = categoryService;
    }

    @GetMapping("/product/")
    public String home(Locale locale, Model model) {
        Date date = new Date();
        DateFormat dateFormat = DateFormat.getDateTimeInstance(DateFormat.LONG,
                DateFormat.LONG, locale);
        String serverTime = dateFormat.format(date);
        ProductService.begin();
        CategoryService.begin();
        model.addAttribute("serverTime", serverTime.toString() );
        List<Product> ProductList = ProductService.getAllProduct();
        model.addAttribute("productList", ProductList );
        List<Category> CategoryList = CategoryService.getAllCategory();
        model.addAttribute("categoryList", CategoryList );
        return "product/index";
    }

    @GetMapping("/product/seedProduct")
    public String seed() {
        ProductService.seed();
        CategoryService.seed();
        return "redirect:/product/";
    }

    @GetMapping("/product/seedCategory")
    public String seed2() {
        CategoryService.seed();
        return "redirect:/product/";
    }


    @GetMapping("/product/addProduct")
    public String add(Model model) {
        model.addAttribute("product", new Product() );
//        categories = new ArrayList<String>();
//        for (Category var : CategoryService.getAllCategory()){
//            categories.add(var.getName());
//        }
//        model.addAttribute("categories", categories );
        List <Category> CategoryList = CategoryService.getAllCategory();
        model.addAttribute("categoryList", CategoryList );
        return "product/addProduct";
    }
    @PostMapping("/product/addProduct")
    public String add(@ModelAttribute Product Product) {
        ProductService.addProduct(Product);
        return "redirect:/product/";
    }

    @GetMapping("/product/addCategory")
    public String addCategory(Model model) {
        model.addAttribute("category", new Category() );
        return "product/addCategory";
    }

    @PostMapping("/product/addCategory")
    public String addCategory(@ModelAttribute Category Category) {
        CategoryService.addCategory(Category);
        return "redirect:/product/";
    }

    // how to put a parameter in a query string
    // e.a. /Product/details?id=3
    @GetMapping("/product/details")
    public String add(@RequestParam("id") long inputId, Model model) {
        model.addAttribute("product", ProductService.getProductById(inputId) );
        return "/product/details";
    }

    // how to put parameter in an URL
    // e.a. /Product/3/edit
    @GetMapping(value = {"/product/{productId}/editProduct"})
    public String edit(Model model, @PathVariable Integer productId) {
        model.addAttribute("product", ProductService.getProductById(productId) );
        List <Category> CategoryList = CategoryService.getAllCategory();
        model.addAttribute("categoryList", CategoryList );
        return "/product/editProduct";
    }
    @PostMapping(value = {"/product/editProduct"})
    public String edit(@ModelAttribute Product Product) {
        ProductService.updateProduct(Product);
        return "redirect:/product/";
    }

    @GetMapping(value = {"/product/{productId}/editCategory"})
    public String edit2(Model model, @PathVariable Integer productId) {
        model.addAttribute("category", CategoryService.getCategoryById(productId) );
        return "/product/editCategory";
    }
    @PostMapping(value = {"/product/editCategory"})
    public String edit2(@ModelAttribute Category Category) {
        CategoryService.updateCategory(Category);
        return "redirect:/product/";
    }

    // how to put a parameter in a query string
    // e.a. /Product/remove?id=3
    @GetMapping("/product/remove")
    public String remove(@RequestParam("id") long id) {
        ProductService.deleteProductById(id);
        return "redirect:/product/";
    }

    @GetMapping("/product/removeCategory")
    public String remove2(@RequestParam("id") long id) {
        ProductService.deleteProductByCategory((CategoryService.getCategoryById(id)).getName());
        CategoryService.deleteCategoryById(id);
        return "redirect:/product/";
    }

}


