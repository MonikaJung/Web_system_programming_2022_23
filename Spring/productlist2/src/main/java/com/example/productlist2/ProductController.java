package com.example.productlist2;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.text.DateFormat;
import java.util.Date;
import java.util.List;
import java.util.Locale;

@Controller
public class ProductController {
    private final ProductService ProductService;

    public ProductController(ProductService ProductService) {
        this.ProductService = ProductService;
    }

    @GetMapping("/product/")
    public String home(Locale locale, Model model) {
        Date date = new Date();
        DateFormat dateFormat = DateFormat.getDateTimeInstance(DateFormat.LONG,
                DateFormat.LONG, locale);
        String serverTime = dateFormat.format(date);
        model.addAttribute("serverTime", serverTime.toString() );
        List<Product> ProductList = ProductService.getAllProduct();
        model.addAttribute("productList", ProductList );
        return "product/index";
    }

    @GetMapping("/product/seed")
    public String seed() {
        ProductService.seed();
        return "redirect:/product/";
    }


    @GetMapping("/product/add")
    public String add(Model model) {
        model.addAttribute("product", new Product() );
        return "product/add";
    }

    @PostMapping("/product/add")
    public String add(@ModelAttribute Product Product) {
        ProductService.addProduct(Product);
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
    @GetMapping(value = {"/product/{productId}/edit"})
    public String edit(Model model, @PathVariable Integer productId) {
        model.addAttribute("product", ProductService.getProductById(productId) );
        return "/product/edit";
    }

    @PostMapping(value = {"/product/edit"})
    public String edit(@ModelAttribute Product Product) {
        ProductService.updateProduct(Product);
        return "redirect:/product/";
    }

    // how to put a parameter in a query string
    // e.a. /Product/remove?id=3
    @GetMapping("/product/remove")
    public String remove(@RequestParam("id") long id) {
        ProductService.deleteProductById(id);
        return "redirect:/product/";
    }

}


