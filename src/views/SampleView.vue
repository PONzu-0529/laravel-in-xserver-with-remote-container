<template>
  <div>
    <div v-if="nowData.id !== -1">ID: {{ nowData.id }}</div>
    <div>Hoge: <input v-model="nowData.hoge"></div>
    <div>Fuga: <input v-model="nowData.fuga"></div>
    <div>Piyo: <input v-model="nowData.piyo"></div>
    <button @click="applyData">Apply</button>
    <button
      v-if="nowData.id !== -1"
      @click="deleteData(nowData.id)"
    >Delete</button>
    <button @click="clear">Clear</button>
  </div>
  <table border="1">
    <tbody>
      <template
        v-for="(item, index) in dataList"
        :key="index"
      >
        <tr>
          <td>{{ item.id }}</td>
          <td>{{ item.hoge }}</td>
          <td>{{ item.fuga }}</td>
          <td>{{ item.piyo }}</td>
          <td>{{ item.created_at }}</td>
          <td>{{ item.updated_at }}</td>
          <td>{{ item.deleted_at }}</td>
          <td>
            <button @click="selectData(item.id)">
              EDIT
            </button>
          </td>
        </tr>
      </template>
    </tbody>
  </table>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component';
import SampleModel, { SampleStyle } from '@/models/SampleModel';

@Options({})
export default class SampleView extends Vue {
  private dataList: Array<SampleStyle>;
  private nowData: SampleStyle;

  public created() {
    this.dataList = [];
    this.nowData = {
      id: -1,
      hoge: '',
      fuga: '',
      piyo: ''
    };
  }

  public async mounted() {
    await this.getDataList();
  }

  private async getDataList(): Promise<void> {
    this.clear();
    this.dataList = [];

    this.dataList = await SampleModel.index();

    this.$forceUpdate();
  }

  private async selectData(item: number): Promise<void> {
    this.nowData = await SampleModel.show(item);

    this.$forceUpdate();
  }

  private async applyData(): Promise<void> {
    if (this.nowData.id === -1) {
      await SampleModel.store(this.nowData);
    } else {
      await SampleModel.update(this.nowData.id, this.nowData);
    }
    await this.getDataList();
  }

  private async deleteData(item: number): Promise<void> {
    await SampleModel.destroy(item);

    await this.getDataList();
  }

  private clear(): void {
    this.nowData.id = -1;
    this.nowData.hoge = '';
    this.nowData.fuga = '';
    this.nowData.piyo = '';

    this.$forceUpdate();
  }
}
</script>
