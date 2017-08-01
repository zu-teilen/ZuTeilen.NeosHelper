# ZuTeilen.NeosHelper



''NodeReference:
  type: references
  ui:
    label: 'Filter'
    inspector:
      group: filter
      position: 10
      editorOptions:
        nodeTypes: ['Vendor.Website:Example']''



''filteredNodes = Neos.Fusion:Collection {
    filterReferences = ${q(node).property('projectCollectionType')}
    nodesToBeFilterd = ${q(site).find('[instanceof Kreait.WebsiteCom:Project]').get()}
    collection = ${ZuTeilen.NeosHelper.filterNodes(this.nodesToBeFilterd, this.filterReferences, 'NodeReference')}
    itemName = 'item'
    itemRenderer = Vendor.Website:ExampleRenderer
}''
