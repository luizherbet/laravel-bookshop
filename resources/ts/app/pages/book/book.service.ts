import axios from "axios";
import { IBook } from "../../shared/model/book.model";

export default class BookService {
    /**
     * Busca todos os livros
     */
    public getAllBooks(): Promise<any> {
        return new Promise<any>((resolve, reject) => {
            axios
                .get('api/books')
                .then(res => {
                    resolve(res);
                })
                .catch(err => {
                    reject(err);
                });
        });
    }

    /**
     * Busca um livro específico por ID
     */
    public getBook(id: number): Promise<any> {
        return new Promise<any>((resolve, reject) => {
            axios
                .get(`api/books/${id}`)
                .then(res => {
                    resolve(res);
                })
                .catch(err => {
                    reject(err);
                });
        });
    }

    public searchBooks(term: string): Promise<any> {
        return new Promise<any>((resolve, reject) => {
            axios
                .get(`api/books/search/${encodeURIComponent(term)}`)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    }
}