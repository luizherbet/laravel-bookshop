// resources/ts/app/pages/home.component.ts
import {Component, Vue} from "vue-property-decorator";
import BookService from "./book/book.service";
import { IBook } from "../shared/model/book.model";
import ShowBookComponent from "../components/show-book.vue";
import SearchBookComponent from "../components/search-book.vue";

@Component({
    components: {
        'show-book': ShowBookComponent,
        'search-book': SearchBookComponent
    }
})
export default class HomeComponent extends Vue {
    private bookService = new BookService();
    public books: IBook[] = [];
    public isLoading = false;
    public error: string | null = null;
    public lastSearchTerm: string | null = null;

    public mounted(): void {
        this.loadBooks();
    }

    public loadBooks(term?: string): void {
        this.isLoading = true;
        this.error = null;

        const request = term && term.length > 0
            ? this.bookService.searchBooks(term)
            : this.bookService.getAllBooks();

        request
            .then(response => {
                const booksData = response.data?.data || response.data || [];
                this.books = Array.isArray(booksData) ? booksData : [];
                this.isLoading = false;
            })
            .catch(err => {
                this.error = 'Erro ao carregar livros. Tente novamente.';
                this.isLoading = false;
            });
    }

    public handleSearch(term: string): void {
        if (!term || term.length === 0) {
            this.loadBooks();
            return;
        }
        this.loadBooks(term);
        this.lastSearchTerm = term;
    }
}