// resources/ts/app/components/show-book.component.ts
import {Prop, Vue} from "vue-property-decorator";
import Component from "vue-class-component";
import { IBook } from "../shared/model/book.model";

@Component
export default class ShowBookComponent extends Vue {

    @Prop({ required: true })
    book!: IBook;

    /**
     * Quando o componente é montado
     */
    public mounted(): void {
        console.log('ShowBookComponent montado com livro:', this.book);
    }
}