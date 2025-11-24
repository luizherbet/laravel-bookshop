// resources/ts/app/components/search-book.component.ts
import { Component, Vue, Prop } from "vue-property-decorator";

@Component
export default class SearchBookComponent extends Vue {
    public term: string = "";

    public onSearch() {
        this.$emit('search-books', this.term.trim());
    }
}