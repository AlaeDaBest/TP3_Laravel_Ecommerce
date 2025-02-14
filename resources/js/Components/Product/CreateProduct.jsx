import React, { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";
const CreateProduct=()=>{
  const [formData, setFormData] = useState({
    sku: "",
    name: "",
    price: "",
    weight: "",
    descriptions: "",
    thumbnail: null,
    image: null,
    stock: "",
    category_id: "", // Include category_id in state
  });
  const [categories, setCategories] = useState([]);
  const [options, setOptions] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    const fetchCategories = async () => {
      try {
        const response = await axios.get("/api/categories");
        setCategories(response.data);
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    };

    const fetchOptions = async () => {
      try {
        const response = await axios.get("/api/options");
        setOptions(response.data);
      } catch (error) {
        console.error("Error fetching options:", error);
      }
    };

    fetchCategories();
    fetchOptions();
  }, []);

  const handleChange = (e) => {
    const { name, value, files } = e.target;

    setFormData((prevState) => ({
      ...prevState,
      [name]: files ? files[0] : value, // Handle files and regular inputs
    }));
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    const apiUrl = "http://127.0.0.1:8000/api/products";
    const data = new FormData();
    Object.keys(formData).forEach((key) => {
      data.append(key, formData[key]);
    });

    try {
      const response = await axios.post(apiUrl, data, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });

      console.log("Product created successfully:", response.data);
      alert("Product created successfully!");
      navigate("/products");
    } catch (error) {
      if (error.response) {
        console.error("Server Error:", error.response.data);
        alert("Error creating product: " + error.response.data.message);
      } else if (error.request) {
        console.error("Network Error:", error.request);
        alert("Error: Unable to connect to the server.");
      } else {
        console.error("Error:", error.message);
        alert("An unexpected error occurred.");
      }
    }
  };
    return(
        <form onSubmit={handleSubmit} >
            <label htmlFor="">Product Sku :</label>
            <input type="text" name="sku" onChange={handleChange} /><br />
            <label htmlFor="">Product Name :</label>
            <input type="text" name="name" onChange={handleChange} /><br />
            <label htmlFor="">Product Price :</label>
            <input type="text" name="price" onChange={handleChange} /><br />
            <label htmlFor="">Product Weight :</label>
            <input type="text" name="weight" onChange={handleChange} /><br />
            <label htmlFor="">Product Descriptions :</label>
            <input type="text" name="descriptions" onChange={handleChange} /><br />
            <label htmlFor="">Categories :</label>
            <select name="category" value={formData.category_id} onChange={handleChange}>
              <option value="">Select Category</option>
              {categories.map((category) => (
                <option key={category.id} value={category.id}>
                  {category.name}
                </option>
              ))}
            </select><br />
            <label htmlFor="">Options :</label>
            <select name="options" value={formData.option} onChange={handleChange} multiple>
              {options.map((option) => (
                <option key={option.id} value={option.id}>
                  {option.option_name}
                </option>
              ))}
            </select><br />
            <label htmlFor="">Product Thumbnail :</label>
            <input type="file" name="thumbnail" onChange={handleChange} /><br />
            <label htmlFor="">Product Image :</label>
            <input type="file" name="image" onChange={handleChange} /><br />
            <label htmlFor="">Product Stock :</label>
            <input type="text" name="stock" onChange={handleChange} /><br />
            <input type="submit" value="Add" />
        </form>
    )
}
export default CreateProduct;